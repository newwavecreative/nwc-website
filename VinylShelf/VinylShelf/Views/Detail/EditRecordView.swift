import SwiftData
import SwiftUI

/// Edit sheet for the user-owned fields: conditions, purchase price,
/// rating, and notes.
struct EditRecordView: View {
    @Bindable var record: VinylRecord

    @Environment(\.modelContext) private var modelContext
    @Environment(\.dismiss) private var dismiss

    var body: some View {
        NavigationStack {
            Form {
                Section("Condition") {
                    conditionPicker("Media", selection: $record.mediaCondition)
                    conditionPicker("Sleeve", selection: $record.sleeveCondition)
                }

                Section("Purchase") {
                    TextField(
                        "Price paid",
                        value: $record.purchasePrice,
                        format: .currency(code: Locale.current.currency?.identifier ?? "USD")
                    )
                    .keyboardType(.decimalPad)
                }

                Section("Rating") {
                    editableStars
                }

                Section("Notes") {
                    TextField("Pressing details, where you found it…", text: notesBinding, axis: .vertical)
                        .lineLimit(3...8)
                }
            }
            .scrollContentBackground(.hidden)
            .vsScreenBackground()
            .navigationTitle("Edit record")
            .navigationBarTitleDisplayMode(.inline)
            .toolbar {
                ToolbarItem(placement: .confirmationAction) {
                    Button("Done") {
                        try? modelContext.save()
                        dismiss()
                    }
                    .font(.vsBody(15, weight: .semibold))
                    .foregroundStyle(Color.vsYellow500)
                }
            }
        }
    }

    private func conditionPicker(_ title: String, selection: Binding<String?>) -> some View {
        Picker(title, selection: selection) {
            Text("Not Set").tag(String?.none)
            ForEach(RecordCondition.grades, id: \.self) { grade in
                Text(grade).tag(String?.some(grade))
            }
        }
    }

    private var editableStars: some View {
        RatingStarsView(rating: record.rating ?? 0, size: 22) { newValue in
            record.rating = newValue
        }
    }

    private var notesBinding: Binding<String> {
        Binding(
            get: { record.notes ?? "" },
            set: { record.notes = $0.isEmpty ? nil : $0 }
        )
    }
}

#Preview {
    EditRecordView(
        record: VinylRecord(discogsID: 1, title: "Rumours", artist: "Fleetwood Mac")
    )
    .modelContainer(for: VinylRecord.self, inMemory: true)
}
