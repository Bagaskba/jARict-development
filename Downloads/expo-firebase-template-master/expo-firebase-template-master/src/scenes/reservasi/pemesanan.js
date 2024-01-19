import React, { useEffect, useState, useContext, useLayoutEffect } from 'react'
import {
  Text,
  View,
  ScrollView,
  StyleSheet,
  TouchableOpacity,
  Image,
} from 'react-native'
import { useNavigation } from '@react-navigation/native'
import TextInputBox from '../../components/TextInputBox'
import ScreenTemplate from '../../components/ScreenTemplate'
import { colors, fontSize } from '../../theme'
import Headerlogo from '../../components/Headerlogo'
import { DatePickerInput } from 'react-native-paper-dates'
import { Picker } from '@react-native-picker/picker'
import Button from '../../components/Button'

export default function Reservasi() {
  const navigation = useNavigation()
  const [selectedLanguage, setSelectedLanguage] = useState()
  const [selectedDate, setSelectedDate] = useState(new Date())

  const [input, setInput] = useState('')

  const onPress = () => {
    if (!selectedDate) {
      alert('Tanggal belum diisi')
    } else {
      alert(
        `Tanggal yang dipilih: ${selectedDate}\nTreatment yang dipilih: ${selectedLanguage}`,
      )
    }
  }

  useEffect(() => {
    console.log('Pemesanan screen')
  }, [])

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingTop: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Reservasi
        </Text>
      </View>
      <View style={{ flexDirection: 'column', paddingVertical: 30 }}>
        <View style={{ paddingHorizontal: 20 }}>
          <Text style={{ fontWeight: 'bold' }}>Input Tanggal</Text>
          <DatePickerInput
            label="Tanggal Reservasi"
            value={selectedDate}
            onChange={(d) => setSelectedDate(d)}
            style={{ marginTop: 90 }}
          />
        </View>
        <View style={{ paddingTop: 100, paddingHorizontal: 20 }}>
          <Picker
            selectedValue={selectedLanguage}
            onValueChange={(itemValue, itemIndex) =>
              setSelectedLanguage(itemValue)
            }
            style={styles.picker}
          >
            <Picker.Item label="Pilih Treatment" value="" />
            <Picker.Item label={`Nama Treatment 1`} value="treatment1" />
            <Picker.Item label={`Nama Treatment 2`} value="treatment2" />
            <Picker.Item label={`Nama Treatment 3`} value="treatment3" />
          </Picker>
        </View>
      </View>
      <View style={{ position: 'absolute', top: 600, width: '100%' }}>
        <Button
          label="Submit"
          color={colors.warnaFont}
          onPress={() => onPress()}
        />
      </View>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  label: {
    fontSize: 18,
    marginBottom: 10,
  },
  picker: {
    height: 50,
    width: '100%',
    borderColor: 'gray',
    borderWidth: 1,
    borderRadius: 5,
    marginBottom: 20,
  },
  selectedValueText: {
    marginTop: 10,
    fontSize: 16,
  },
  cardContainer: {
    marginVertical: 10,
    borderRadius: 10,
    overflow: 'hidden',
    paddingHorizontal: 20,
  },
  card: {
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  cardImage: {
    width: '100%', // Sesuaikan ukuran gambar
    height: 200, // Sesuaikan ukuran gambar

    marginBottom: 10,
  },
  cardTitle: {
    fontSize: fontSize.xLarge,
    textAlign: 'center',
    fontWeight: 'bold',
    textTransform: 'uppercase',
  },
  lightContent: {
    backgroundColor: colors.lightyellow,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  darkContent: {
    backgroundColor: colors.gray,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  main: {
    flex: 1,
    width: '100%',
  },
  title: {
    fontSize: fontSize.xxxLarge,
    marginBottom: 20,
    textAlign: 'center',
  },
  field: {
    fontSize: fontSize.middle,
    textAlign: 'center',
  },
})
