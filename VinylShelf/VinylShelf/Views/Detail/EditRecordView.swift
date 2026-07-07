import SwiftData
import SwiftUI

/// Edit sheet for the user-owned fields: conditions, purchase price,
/// rating, and notes.
struct EditRecordView: View {
    @Bindable var record: VinylRecord

    @Environment(\.modelContext) private var modelContext
    @Environment(\.dismiss) private var dismiss

    // Plain text backing for the price. A `.currency`-formatted TextField
    // reformats on every keystroke ("2" → "2.00", then typing 5 lands inside
    // the formatted string), so we take raw decimal input and parse it.
    @State private var priceText = ""

    var body: some View {
        NavigationStack {
            Form {
                Section("Condition") {
                    conditionPicker("Media", selection: $record.mediaCondition)
                    conditionPicker("Sleeve", selection: $record.sleeveCondition)
                }

                Section("Purchase") {
                    HStack(spacing: 6) {
                        Text(Locale.current.currencySymbol ?? "$")
                            .foregroundStyle(Color.vsTextMuted)
                        TextField("0.00", text: $priceText)
                            .keyboardType(.decimalPad)
                    }
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
            .onAppear {
                if let price = record.purchasePrice {
                    priceText = String(format: "%.2f", price)
                }
            }
            .onChange(of: priceText) { _, newValue in
                priceChanged(newValue)
            }
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

    /// Keep only digits and a single decimal separator (max two decimals),
    /// then mirror the parsed value onto the record. Empty clears the price.
    private func priceChanged(_ text: String) {
        var cleaned = ""
        var hasSeparator = false
        var decimals = 0
        for character in text {
            if character.isNumber {
                if hasSeparator {
                    guard decimals < 2 else { continue }
                    decimals += 1
                }
                cleaned.append(character)
            } else if character == "." || character == "," {
                guard !hasSeparator else { continue }
                hasSeparator = true
                cleaned.append(character)
            }
        }
        if cleaned != text {
            priceText = cleaned
        }
        record.purchasePrice = Double(cleaned.replacingOccurrences(of: ",", with: "."))
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
